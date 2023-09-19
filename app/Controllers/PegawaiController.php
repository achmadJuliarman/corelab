<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class PegawaiController extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Pegawai",
            "sub_menu" => "data-pegawai",
            "pegawai" => $this->pegawaiModel->orderBy('NO', 'DESC')->findAll(),
            "levels" => $this->userLevelModel->findAll()
        ];
        // dd($data['pegawai']);
        return view('pegawai/index', $data);
    }

    public function tambah()
    {
        $validInput = $this->validate([
            'nama' => [
                'rules' => 'required|is_unique[tbl_pegawai.NAMA]',
                'errors' => [
                    'required' => 'Nama Pegawai Tidak Boleh Kosong',
                    'is_unique' => 'Nama / Username Pegawai sudah ada'
                ]
            ],
            'telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'No Telp Tidak Boleh Kosong',
                    'numeric' => 'No telp Harus Berupa Angka'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP Harus Diisi',
                    'numeric' => 'NIP Harus Berupa Angka'
                ]
            ]
        ]);

        if(!$validInput) {
            $validation = $this->validator;
            return redirect()->to('pegawai')->withInput()->with('validation', $validation); // $validation ini akan digenerate sebagai data session
        }

        $data = [
            'NAMA' => $this->request->getVar('nama'),
            'PASSWORD' => $this->request->getVar('pass'),
            'NIP' => $this->request->getVar('nip'),
            'TELP' => $this->request->getVar('telp'),
            'ID_LEVEL' => $this->request->getVar('level')
        ];
    
        $this->pegawaiModel->save($data);

        return redirect()->to('pegawai/')->with('success', 'Berhasil Tambah Data Pegawai');
    }

    public function ubah()
    {
        $validInput = $this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pegawai Tidak Boleh Kosong'
                ]
            ],
            'telp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'No Telp Tidak Boleh Kosong',
                    'numeric' => 'No telp Harus Berupa Angka'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIP Harus Diisi'
                ]
            ]
        ]);

        if(!$validInput) {
            $validation = $this->validator;
            return redirect()->to('pegawai')->withInput()->with('validation', $validation); // $validation ini akan digenerate sebagai data session
        }

        $data = [
            'NO' => $this->request->getVar('no'),
            'NAMA' => $this->request->getVar('nama'),
            'NIP' => $this->request->getVar('nip'),
            'TELP' => $this->request->getVar('telp'),
            'ID_LEVEL' => $this->request->getVar('level'),
        ];
        $this->pegawaiModel->update($data['NO'], $data);
        return redirect()->to('pegawai/')->with('success', 'Berhasil Ubah Data Pegawai');
    }

    public function hapus()
    {
        $no = $this->request->getVar('no');
        $this->pegawaiModel->delete($no);
        return redirect()->to('pegawai/')->with('success', 'Berhasil Hapus Data Pegawai');
    }

    // METHOD - METHOD UNTUK EXPORT DATA PEGAWAI MENJADI BERBAGAI FORMAT FILE
    public function exportexcel()
    {
        $pegawai = $this->pegawaiModel->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Password');
        $sheet->setCellValue('D1', 'Nip');
        $sheet->setCellValue('E1', 'Telp');

        $column = 2; //kolom start

        //Untuk mengatur value dalam excel
       foreach ($pegawai as $key => $value) {
         $sheet->setCellValue('A'.$column, ($column-1));
         $sheet->setCellValue('B'.$column, $value->NAMA);
         $sheet->setCellValue('C'.$column, $value->PASSWORD);
         $sheet->setCellValue('D'.$column, $value->NIP);
         $sheet->setCellValue('E'.$column, $value->TELP);
         $column++;
       }
        //Mengatur style yang ada
       $sheet->getStyle('A1:F1')->getFont()->setBold(true);
       $sheet->getStyle('A1:F1')->getFill()
             ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
             ->getStartColor()->setARGB('FFFFFF00');
       $styleArray = [
            'borders' => [
                'allBorders' =>[
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

       $sheet->getStyle('A1:F'.($column-1))->applyFromArray($styleArray);

        //Agar Auto Size saat di export di excel
       $sheet->getColumnDimension('A')->setAutoSize(true);
       $sheet->getColumnDimension('B')->setAutoSize(true);
       $sheet->getColumnDimension('C')->setAutoSize(true);
       $sheet->getColumnDimension('D')->setAutoSize(true);


        //untuk melakukan download excel dan penamaan file nya
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Data Pegawai.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportpdf()
    {

        $data = [
            "pegawai" => $this->pegawaiModel->orderBy('NO', 'ASCE')->findAll(),
        ];

        $view = view('pegawai/export-pegawai-pdf' , $data);

        // instantiate and use the dompdf class
       
        $dompdf = new Dompdf;
        $dompdf->set_option("enable_remote", true);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data-pegawai", array("Attachment"=>false));

    }

}

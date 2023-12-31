<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class CoreController extends BaseController
{

    public function index(): string
    {
        $data = [
            "title" => "Core",
            "sub_menu" => "data-core",
            "core" => $this->coreModel->paginate(25, 'core'),
            "pager" => $this->coreModel->pager,
            "total" => $this->coreModel->countAllResults()
        ];
        return view('core/index', $data);
    }

    public function old_index()
    {
        $data = [
            "title" => "Core",
            "sub_menu" => "data-core",
            "core" => $this->coreModel->findAll(),
        ];
        return view('core/old_index', $data);
    }

    public function tambah()
    {
        $config['upload_path']   = './assets/img';

        // ambil file foto spesimen
        $fotoSpesimen = $this->request->getFile('foto');

        // cek apakah ada foto atau tidak
        if ($fotoSpesimen->getError() == 4) {
            $fotoName = 'default.jpg';
        } else {
            $fotoName = $fotoSpesimen->getRandomName();
            $fotoSpesimen->move(ROOTPATH . 'public/assets/img', $fotoName);
        }

        $data = [
            'SHIP' => $this->request->getVar('ship'),
            'CRUISE_' => $this->request->getVar('cruise'),
            'SAMPEL_NUM' => $this->request->getVar('sampel_num'),
            'DEVICE' => $this->request->getVar('device'),
            'SUM' => $this->request->getVar('sum'),
            'DATE' => $this->request->getVar('date'),
            'DEPTH' => $this->request->getVar('depth'),
            'LENGTH' => $this->request->getVar('length'),
            'LOCATION' => $this->request->getVar('location'),
            'SED_TYPE' => $this->request->getVar('sed_type'),
            'STORAGE' => $this->request->getVar('storage'),
            'REMARK' => $this->request->getVar('remark'),
            'LATITUDE' => $this->request->getVar('latitude'),
            'LONGITUDE' => $this->request->getVar('longitude'),
            'FOTO_SPESIMEN' => $fotoName,
        ];

        $this->coreModel->save($data);
        return redirect()->to('core/')->with('success', 'Berhasil Tambah Data CORE');
    }

    public function edit()
    {
        $no = $this->request->getVar('no');
        $fotoName = $this->request->getVar('foto-lama'); // Default to the old image name

        // Check if a new image is uploaded
        if ($this->request->getFile('foto')->getError() !== 4) {
            $fotoSpesimen = $this->request->getFile('foto');
            $fotoName = $fotoSpesimen->getRandomName();
            $fotoSpesimen->move(ROOTPATH . 'public/assets/img', $fotoName);

            // Remove old image if it's not the default image
            $fotoLama = $this->coreModel->find($no);
            if ($fotoLama->FOTO_SPESIMEN != 'default.png') {
                unlink('assets/img/' . $fotoLama->FOTO_SPESIMEN);
            }
        }

       $data = [
                'SHIP' => $this->request->getVar('ship'),
                'CRUISE_' => $this->request->getVar('cruise'),
                'SAMPEL_NUM' => $this->request->getVar('sampel_num'),
                'DEVICE' => $this->request->getVar('device'),
                'SUM' => $this->request->getVar('sum'),
                'DATE' => $this->request->getVar('date'),
                'DEPTH' => $this->request->getVar('depth'),
                'LENGTH' => $this->request->getVar('length'),
                'LOCATION' => $this->request->getVar('location'),
                'SED_TYPE' => $this->request->getVar('sed_type'),
                'STORAGE' => $this->request->getVar('storage'),
                'REMARK' => $this->request->getVar('remark'),
                'VOL' => $this->request->getVar('vol'),
                'LATITUDE' => $this->request->getVar('latitude'),
                'LONGITUDE' => $this->request->getVar('longitude'),
                'FOTO_SPESIMEN' => $fotoName
            ];

        // Update the data in the database
        $success = $this->coreModel->update($no, $data);

        if ($success) {
            // Return a JSON response indicating success
            return $this->response->setJSON(['success' => true]);
        } else {
            // Return a JSON response indicating error
            return $this->response->setJSON(['success' => false]);
        }
    }


    public function hapus()
    {
        // cari gambar berdasarkan id
        $no = $this->request->getVar('no');
        $foto = $this->coreModel->find($no);
        // hapus gambar 
        if ($foto->FOTO_SPESIMEN != 'default.png') {
            unlink('assets/img/' . $foto->FOTO_SPESIMEN);
        }
        $this->coreModel->delete($no);
        return redirect()->to('core/')->with('success', 'Berhasil Hapus Data CORE');
    }

    public function cari(){
        // DATATABLE (SERVER SIDE)
        // REFERENSI https://www.youtube.com/watch?v=Kt6rnX8J37A
        $param['draw'] = !empty($_REQUEST['draw']) ? $_REQUEST['draw'] : ''; 
        $keywords = !empty($_REQUEST['search']['value']) ? $_REQUEST['search']['value'] : '';
        $start = !empty($_REQUEST['start']) ? $_REQUEST['start'] : '';
        $length = !empty($_REQUEST['length']) ? $_REQUEST['length'] : '';


        $data = $this->coreModel->tampilDataAjax($keywords, intVal($start), intVal($length));

        $jumlahData = $this->coreModel->tampilDataAjax($keywords);

        $output = array(
            "draw" => intVal($param['draw']),
            "recordsTotal" => count($jumlahData),
            "recordsFiltered" => count($jumlahData),
            "data" => $data
        );
        echo json_encode($output);

    }

    // METHOD - METHOD UNTUK EXPORT DATA PEGAWAI MENJADI BERBAGAI FORMAT FILE
    public function exportexcel()
    {
        $pegawai = $this->coreModel->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Ship');
        $sheet->setCellValue('C1', 'Cruise');
        $sheet->setCellValue('D1', 'Sample Number');

        $sheet->setCellValue('E1', 'Date');
        $sheet->setCellValue('F1', 'Depth');
        $sheet->setCellValue('G1', 'Length');
        $sheet->setCellValue('H1', 'Location');

        $column = 2; //kolom start

        //Untuk mengatur value dalam excel
        foreach ($pegawai as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->SHIP);
            $sheet->setCellValue('C' . $column, $value->CRUISE_);
            $sheet->setCellValue('D' . $column, $value->SAMPEL_NUM);
            $sheet->setCellValue('E' . $column, $value->DATE);
            $sheet->setCellValue('F' . $column, $value->DEPTH);
            $sheet->setCellValue('G' . $column, $value->LENGTH);
            $sheet->setCellValue('H' . $column, $value->LOCATION);
            $column++;
        }
        //Mengatur style yang ada
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A1:H1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:H' . ($column - 1))->applyFromArray($styleArray);

        //Agar Auto Size saat di export di excel
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);


        //untuk melakukan download excel dan penamaan file nya
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Data Core.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function exportpdf()
    {
        $data = [
            "core" => $this->coreModel->orderBy('NO', 'ASCE')->findAll(),
        ];

        $view = view('core/export-core-pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->set_option("enable_remote", true);
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data-core", array("Attachment" => false));
    }
}

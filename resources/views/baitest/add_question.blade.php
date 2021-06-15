@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm câu hỏi</strong>
            </div>
            <div class="card-body card-block">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <form action="{{URL::to('/import-csv')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="file" accept=".xlsx" >
                            <input type="submit" value="Nhập file Excel"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" class="fas fa-download fa-sm text-white-50">
                            </form>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">STT</th>
                                                <th style="width: 272.75px;">Câu hỏi</th>
                                                <th style="width: 200px;">Lựa chọn A</th>
                                                <th style="width: 200px;">Lựa chọn B</th>
                                                <th style="width: 200px;">Lựa chọn C</th>
                                                <th style="width: 200px;">Lựa chọn D</th>
                                                <th style="width: 100px;">Đáp Án</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        {{-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> --}}
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($ds_cauhoi as $key => $ql)
                                                <tr>
                                                    <td> <?php
                                                        echo $i;
                                                        $i = $i + 1;
                                                        ?></td>
                                                    <td><?php echo $ql->cauhoi?></td>
                                                    <td><?php echo $ql->luachona?></td>
                                                    <td><?php echo $ql->luachonb?></td>
                                                    <td><?php echo $ql->luachonc?></td>
                                                    <td><?php echo $ql->luachond?></td>
                                                    <td>{{ $ql->dapan }}</td>
                                                    <td style="font-size: 20px">
                                                        <a href="{{ URL::to('/edit-question/' . $ql->id_cauhoi) }}"> <i
                                                                class="fas fa-edit" style="color: blue; margin: 0 5px;"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                 <form action="{{url('export-csv')}}" method="POST">
                    @csrf
                 <input type="submit" value="Xuất file Excel" name="export_csv" class="btn btn-success">
                </form>
            </div>

        </div>

    </div>

@endsection

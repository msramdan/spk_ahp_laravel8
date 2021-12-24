@extends('layouts.master')
@section('title', 'Hasil')
@section('content')
@php
    $list = DB::select("SELECT rangking.*,alternatif.nama_alternatif From rangking join alternatif on alternatif.id = rangking.alternatif_id where jenis_bansos_id='$jenis_bansos_id' order by nilai_prioritas DESC");
    foreach ($list as $row) {
        $labels[] = $row->nama_alternatif;
		$nilai_prioritas[] = $row->nilai_prioritas;
    }
@endphp

@if ($list)
<div class="row" >
    <div class="col-sm-6" id="content2">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="card-body">
                    <div>
                        @php
                            $data = DB::table('jenis_bansos')->where('id', $jenis_bansos_id)->first();
                            $nama_jenis_bansos =  $data->nama_jenis_bansos;
                        @endphp

                        <h5>Rangking Alternatif Bansos {{ $nama_jenis_bansos }}</h5>

                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Rangking</th>
                                    <th>Nama Alternatif</th>
                                    <th>Nilai Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_alternatif }}</td>
                                        <td>{{ $row->nilai_prioritas }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Grafik Rangking Alternatif Bansos {{ $nama_jenis_bansos }}</h5>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-info" id="downloadPDF" style="background: #0155a4; border-color: #0155a4;margin:10px">Download</button>
@endsection

@push('js')
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: <?= json_encode($labels); ?>,
        datasets: [{
            label: 'Grafik Rangking',
            data: <?= json_encode($nilai_prioritas); ?>,
            fill: true,
            backgroundColor: getRandomColor,
            borderWidth: 1
        }]
    },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

<script type="text/javascript">
    $('#downloadPDF').click(function () {
        domtoimage.toPng(document.getElementById('content2'))
            .then(function (blob) {
                var pdf = new jsPDF('l', 'mm', [$('#content2').width(), $('#content2').height()]);

                pdf.addImage(blob, 'PNG', 0, 0, $('#content2').width(), $('#content2').height());
                pdf.save("export.pdf");

                that.options.api.optionsChanged();
            });
    });

    </script>

@endpush

@else
<div class="alert alert-success alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Belum ada hitungan</strong>
</div>
@endsection
@endif



@extends('layouts.app')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Tag</h5><br>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tambah</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <label>Nama Tag</label>
            <input class="form-control" type="text" name="nama_tag" id="">
            <button type="submit" class="btn btn-outline-info tombol-simpan-tag">
                    Simpan Data
                </button>
    </div>
    
  </form>
</div>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Tag</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-tag">
                            
                        </tbody>
                    </table>

                    <br>
                       
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

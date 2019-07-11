@extends('layouts.app')

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Kategori</h5><br>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tambah</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <label>Nama Kategori</label>
            <input class="form-control" type="text" name="nama_kategori" id="">
            <button type="submit" class="btn btn-outline-info tombol-simpan">
                    Simpan Data
                </button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-kategori">
                            
                        </tbody>
                    </table>

                    <br>
                   
                            {{-- <div class="form-group">
                                <label>Nama Kategori</label>
                                <input class="form-control" type="text" name="nama_kategori" id="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-info tombol-simpan">
                                    Simpan Data
                                </button>
                            </div> --}}
                       
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

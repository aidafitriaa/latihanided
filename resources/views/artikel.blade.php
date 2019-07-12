@extends('layouts.app')

{{-- @section('js')
<script src="{{ ('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'kontennya' );
</script>
@endsection --}}

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables Artikel</h5><br>
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Tambah</button>
<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        
    </div>
    <div class="container">
            <label>Judul</label>
            <input class="form-control" type="text" name="judul" id=""required>
            <input class="form-control" type="file" name="foto" id="" required>
            <select class="form-control" name="isi_tag[]" id="s2_demo3" multiple="multiple" required>
            </select>
            <select class="form-control" name="id_kategori" id="" required>
            </select>
            <textarea class="form-control ckeditor" name="konten" id="kontennya" required></textarea>
            <button type="submit" class="btn btn-outline-info tombol-simpan">
                    Simpan Data
                </button>
    </div>
    
  </form>
</div>
                <div class="card-body">
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Foto</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-artikel">
                            
                        </tbody>
                    </table>

                    <br>           
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('admin.admin_master')

@section('admin')
    
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-inverse bg-img" >
                <div class="box-body text-center pb-50">
                  
                  <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($adminData->profile_photo_path))?url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}">

                  <h3 class="widget-user-username"> Admin Name: {{ $adminData->name }} </h3>

                  <h6 class="widget-user-desc">Admin Email: {{ $adminData->email }} </h5>

                  <a class="btn btn-success mb-5" href="{{ route('admin.profile.edit') }}">Edit Profile</a>

                </div>

                <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                  <li>
                    <span class="opacity-60">Followers</span><br>
                    <span class="font-size-20">8.6K</span>
                  </li>
                  <li>
                    <span class="opacity-60">Following</span><br>
                    <span class="font-size-20">8457</span>
                  </li>
                  <li>
                    <span class="opacity-60">Tweets</span><br>
                    <span class="font-size-20">2154</span>
                  </li>
                </ul>
              </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection  
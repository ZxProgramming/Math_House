
@php
  function fun_admin(){
    return 'student';
  }
  @endphp
<x-default-layout>

@section('title','Profile')

<div class="card mb-4">
      
    <h5 class="card-header">Profile : {{  auth()->user()->name }}</h5>
    <!-- Account -->
    
      <form id="formAccountSettings" action="{{ route('stu_edit_profile') }}" method="POST" enctype="multipart/form-data" >
          @csrf
          <input type="hidden" name="id" value = {{ auth()->user()->id }}>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="{{asset('images/users/' . auth()->user()->image) }}" alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar" />
              <div class="button-wrapper">
          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input
              type="file"
              id="upload"
              name="image"
              value="{{auth()->user()->image }}"
              class="account-file-input"
              hidden
              />
              
          </label>
      
          
        </div>
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Name</label>
            <input
              class="form-control"
              type="text"
              id="firstName"
              value="{{ auth()->user()->name }}"
              placeholder="{{ auth()->user()->name }}"
              readonly
            />
          </div>
         
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input
              class="form-control"
              type="text"
              id="email"
              value="{{ auth()->user()->email }}"
              readonly />
          </div>
          
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">Phone</label>
            <div class="input-group input-group-merge">
     
              <input
                type="text"
                id="phoneNumber"
                class="form-control"
                value="{{ auth()->user()->phone }}"
                readonly />
            </div>
          </div>

          <div class="mb-3 col-md-6">
            <label class="form-label" for="Password">password</label>
            <div class="input-group input-group-merge">
           
              <input
                type="password"
                id="Password"
                name="password"
                value=""
                class="form-control"
                placeholder="Enter Your New Password" />
            </div>
          </div>
         
              <input
                type="hidden"
                id="OldPassword"
                name="password" 
                value="{{auth()->user()->password}}"
                class="form-control"
                placeholder="Enter Your Old Password"
                 />
            
      
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Add Parent Email</label>
              <div class="input-group input-group-merge">
                <input
                  type="text"
                  id=""
                  value="{{auth()->user()->parent_email}}"
                  name="parent_email"
                  class="form-control"/>
              </div>
            </div>
            
      
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Add Parent Phone</label>
              <div class="input-group input-group-merge">
                <input
                  type="text"
                  id=""
                  value="{{auth()->user()->parent_phone}}"
                  name="parent_phone"
                  class="form-control"/>
              </div>
            </div>
            
      
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Add Extra Email</label>
              <div class="input-group input-group-merge">
                <input
                  type="text"
                  id=""
                  name="extra_email"
                  type="email"
                  value="{{auth()->user()->extra_email}}"
                  class="form-control"/>
              </div>
            </div>
         
         

        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Edit</button>
        </div>
      </form>
    </div>
    <!-- /Account -->
  </div>

</x-default-layout>
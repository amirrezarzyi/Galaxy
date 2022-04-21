<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
        data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-more-vertical">
            <circle cx="12" cy="12" r="1"></circle>
            <circle cx="12" cy="5" r="1"></circle>
            <circle cx="12" cy="19" r="1"></circle>
        </svg>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
       <a class="dropdown-item" data-bs-target="#roleModalCenter{{$user->id}}"
          data-bs-toggle="modal">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
       <span>ویرایش دسترسی ها</span>
       </a>
       <form action="{{ route('admin.user.destroy',$user->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn dropdown-item" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
          <span>حذف</span>
          </button>
      </form>
    </div>
 </div>
{{-- MODAL --}}
<div class="modal fade" id="roleModalCenter{{$user->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
       <div class="modal-content">
          <div class="modal-header bg-transparent">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5 pb-5">
             <div class="text-center mb-4">
                <h1>ویرایش نقش کاربر <small>{{$user->name}}</small></h1>
             </div>
             <!-- Add role form -->
             <form id="addRoleForm" action="{{ route('admin.user.set-role',$user->id) }}" method="post" class="row" onsubmit="return true">
                @csrf
                <div class="list-group">
                   @foreach ($roles as $role)
                   <label for="{{ $user->id.$role->id }}">
                      <li class="list-group-item list-group-item-action me-3">
                         <input class="form-check-input me-1" type="checkbox" name="roles[]" value="{{$role->id}}"
                         id="{{ $user->id.$role->id }}"
                         @foreach ($user->roles as $userRole)
                         {{($userRole->id === $role->id ? 'checked' : '')}}
                         @endforeach
                         />
                   <label for="{{ $user->id.$role->id }}">{{ $role->name }}</label>
                   </li>
                   </label>
                   @endforeach
                </div>
                <div class="col-12 text-center mt-2">
                   <button type="submit" class="btn btn-primary me-1">ذخیره</button>
                   <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                   انصراف
                   </button>
                </div>
             </form>
             <!--/ Add role form -->
          </div>
       </div>
    </div>
 </div>

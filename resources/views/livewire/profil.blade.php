<div>
    <div class="page-content-inner">

        <!--Edit Profile-->
        <div class="account-wrapper">
            <div class="columns">

                <!--Navigation-->
                <div class="column is-4">
                    <div class="account-box is-navigation">
                        <div class="media-flex-center">
                            <div class="h-avatar is-large" >
                                <span class="h-icon is-info is-rounded text-black is-1 fw-bolder h-400" style="height: 60px ; width: 60px;" >
                                    @if (!is_null(Auth::user()->name))
                                        <div class="is-2  title text-capitalize is-narrow is-thin  ">
                                            {{ Str::substr(Auth::user()->name, 0, 2) }}
                                        </div>
                                    @endif

                                </span>
                            </div>
                            <div class="flex-meta" >
                                <span style="text-transform: uppercase;">{{ $name }}</span>
                                <span style="text-transform: capitalize;">{{ $email }}</span>
                                <span style="text-transform: capitalize;">{{ Auth::user()->role }}</span>
                            </div>
                        </div>

                        <div class="account-menu">
                            <a  class="account-menu-item is-active">
                                <i class="lnil lnil-user-alt"></i>
                                <span>Umum</span>
                                <span class="end">
                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                              </span>
                            </a>
                            {{-- <a href="/webapp-profile-edit-2.html" class="account-menu-item">
                                <i class="lnil lnil-crown-alt"></i>
                                <span>Experience</span>
                                <span class="end">
                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                              </span>
                            </a>
                            <a href="/webapp-profile-edit-3.html" class="account-menu-item">
                                <i class="lnil lnil-quill"></i>
                                <span>Skills</span>
                                <span class="end">
                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                              </span>
                            </a>
                            <a href="/webapp-profile-edit-4.html" class="account-menu-item">
                                <i class="lnil lnil-cog"></i>
                                <span>Settings</span>
                                <span class="end">
                                  <i aria-hidden="true" class="fas fa-arrow-right"></i>
                              </span>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!--Form-->
                <div class="column is-8">
                    <div class="account-box is-form is-footerless">
                        <div class="form-head stuck-header">
                            <div class="form-head-inner">
                                <div class="left">
                                    <h3>Edit Profil</h3>
                                    {{-- <p>Edit your account's general information</p> --}}
                                </div>
                                <div class="right">
                                    <div class="buttons">
                                        <a href="{{ url()->previous() }}" class="button h-button is-light is-dark-outlined">
                                            <span class="icon">
                                              <i class="lnir lnir-arrow-left rem-100"></i>
                                          </span>
                                            <span>Kembali</span>
                                        </a>
                                        {{-- <button id="save-button" class="button h-button is-primary is-raised">Save Changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-body">
                            <!--Fieldset-->

                            <div class="fieldset">
                                <div class="fieldset-heading">
                                    <h4>Informasi Pribadi</h4>
                                    {{-- <p>Others diserve to know you more</p> --}}
                                </div>
                            {{-- <form wire:submit.prevent="UpdatePro()" > --}}

                                <div class="columns is-multiline">
                                    <!--Field-->
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control has-icon  @error('name') has-validation has-error @enderror">
                                                <input type="text" wire:model.defer="name" class="input" placeholder="Nama ">
                                                <div class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </div>
                                            </div>
                                        </div>
                                        @error('name')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                    <!--Field-->

                                    <!--Field-->
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control has-icon   @error('email') has-validation has-error @enderror">
                                                <input type="text" wire:model.defer="email" class="input" placeholder="Email ">
                                                <div class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                                </div>
                                            </div>
                                            @error('email')
                                            <span class="error  text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--Field-->

                                </div>
                                        <a  wire:click.prevent="UpdatePro()" class="button h-button is-success is-raised">Simpan</a>
                             {{-- </form> --}}

                            </div>

                            <!--Fieldset-->

                                <div class="fieldset">
                                <div class="fieldset-heading">
                                    <h4>Ganti Password</h4>
                                    <p></p>
                                </div>
                            {{-- <form wire:submit.prevent="gantiPass()" > --}}

                                <div class="columns is-multiline">
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control has-icon  @error('password') has-validation has-error @enderror">
                                                <input type="password" wire:model='password' class="input" placeholder="Password Baru ">
                                                <div class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                                                </div>
                                            </div>
                                            @error('password')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                                        </div>
                                    </div>
                                    <div class="column is-12">
                                        <div class="field">
                                            <div class="control has-icon  @error('password_confirmation') has-validation has-error @enderror">
                                                <input type="password" wire:model='password_confirmation' class="input" placeholder="Komfirmasi Password ">
                                                <div class="form-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>

                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                    <span class="error  text-danger">{{ $message }}</span>
                                @enderror
                                        </div>
                                    </div>


                                </div>
                                <button  wire:click.prevent="gantiPass()" class="button h-button is-primary is-raised">Simpan</button>
                            {{-- </form> --}}

                            </div>
                            <!--Fieldset-->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

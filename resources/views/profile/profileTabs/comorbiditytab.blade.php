 <div class="tab-pane fade" id="kt_user_view_overview_health_tab" role="tabpanel">
     <!--begin::Card-->
     <div class="card pt-4 mb-6 mb-xl-9">
         <!--begin::Card header-->
         <div class="card-header border-0">
             <!--begin::Card title-->
             <div class="card-title flex-column">
                 <h2>Health Disclosure</h2>
                 <div class="fs-6 fw-bold text-muted">It helps the center make well-informed choices and take appropriate
                     actions based on the provided health information.</div>
             </div>
             <!--end::Card title-->
         </div>
         <!--end::Card header-->
         <!--begin::Card body-->
         <div class="card-body">
             <!--begin::Form-->
             <form class="form" id="kt_users_comorbidity_form">
                 <div style="max-height: 200px; overflow-y: auto;">
                     @foreach ($comorbidityList as $data)
                         <!--begin::Item-->
                         <div class="d-flex">
                             <!--begin::Checkbox-->
                             <div class="form-check form-check-custom form-check-solid">
                                 <!--begin::Input-->
                                 {{-- <input class="form-check-input me-3" name="comorbidity[]" type="checkbox"
                                     value="{{ $data->id }}" id="kt_modal_update_comorbidity_{{ $data->id }}"
                                     checked='checked' /> --}}
                                 <input class="form-check-input me-3" name="comorbidity[]" type="checkbox"
                                     value="{{ $data->id }}" id="kt_modal_update_comorbidity_{{ $data->id }}"
                                     @if ($userComorbidity->contains('comorbidity_id', $data->id)) checked @endif />

                                 <!--end::Input-->
                                 <!--begin::Label-->
                                 <label class="form-check-label" for="kt_modal_update_comorbidity_{{ $data->id }}">
                                     <div class="fw-bolder">{{ $data->comorbidity }}</div>
                                     <div class="text-gray-600">{{ $data->description }}
                                     </div>
                                 </label>
                                 <!--end::Label-->
                             </div>
                             <!--end::Checkbox-->
                         </div>
                         <!--end::Item-->
                     @endforeach
                 </div>
                 <!--begin::Action buttons-->
                 <div class="d-flex justify-content-end align-items-center mt-12">
                     <!--begin::Button-->
                     <button type="button" class="btn btn-primary" id="kt_users_comorbidity_submit"
                         data-kt-comorbidity-action="submit">
                         <span class="indicator-label">Save</span>
                         <span class="indicator-progress">Please wait...
                             <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                     </button>
                     <!--end::Button-->
                 </div>
                 <!--begin::Action buttons-->

             </form>
             <!--end::Form-->
         </div>
         <!--end::Card body-->
         <!--begin::Card footer-->
         <!--end::Card footer-->
     </div>
     <!--end::Card-->
 </div>

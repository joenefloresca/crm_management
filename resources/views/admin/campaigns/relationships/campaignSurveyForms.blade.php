@can('survey_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.survey-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.surveyForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.surveyForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-campaignSurveyForms">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.campaign') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.survey_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.address_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.county') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyForm.fields.phone_number') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveyForms as $key => $surveyForm)
                        <tr data-entry-id="{{ $surveyForm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $surveyForm->id ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->campaign->campaign ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->survey_name ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->address_1 ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->address_2 ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->address_3 ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->address_4 ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->city ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->state ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->county ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->country ?? '' }}
                            </td>
                            <td>
                                {{ $surveyForm->phone_number ?? '' }}
                            </td>
                            <td>
                                @can('survey_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.survey-forms.show', $surveyForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('survey_form_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.survey-forms.edit', $surveyForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('survey_form_delete')
                                    <form action="{{ route('admin.survey-forms.destroy', $surveyForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('survey_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.survey-forms.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-campaignSurveyForms:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
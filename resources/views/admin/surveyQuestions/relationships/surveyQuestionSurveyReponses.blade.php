@can('survey_reponse_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.survey-reponses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.surveyReponse.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.surveyReponse.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-surveyQuestionSurveyReponses">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.surveyReponse.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyReponse.fields.survey_form') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyReponse.fields.survey_question') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyReponse.fields.response') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveyReponses as $key => $surveyReponse)
                        <tr data-entry-id="{{ $surveyReponse->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $surveyReponse->id ?? '' }}
                            </td>
                            <td>
                                {{ $surveyReponse->survey_form->survey_name ?? '' }}
                            </td>
                            <td>
                                {{ $surveyReponse->survey_question->code ?? '' }}
                            </td>
                            <td>
                                {{ $surveyReponse->survey_question->question ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SurveyReponse::RESPONSE_SELECT[$surveyReponse->response] ?? '' }}
                            </td>
                            <td>
                                @can('survey_reponse_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.survey-reponses.show', $surveyReponse->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('survey_reponse_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.survey-reponses.edit', $surveyReponse->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('survey_reponse_delete')
                                    <form action="{{ route('admin.survey-reponses.destroy', $surveyReponse->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('survey_reponse_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.survey-reponses.massDestroy') }}",
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
  let table = $('.datatable-surveyQuestionSurveyReponses:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
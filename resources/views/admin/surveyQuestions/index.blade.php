@extends('layouts.admin')
@section('content')
@can('survey_question_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.survey-questions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.surveyQuestion.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.surveyQuestion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SurveyQuestion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.is_active') }}
                        </th>
                        <th>
                            {{ trans('cruds.surveyQuestion.fields.campaign') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($campaigns as $key => $item)
                                    <option value="{{ $item->campaign }}">{{ $item->campaign }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveyQuestions as $key => $surveyQuestion)
                        <tr data-entry-id="{{ $surveyQuestion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $surveyQuestion->id ?? '' }}
                            </td>
                            <td>
                                {{ $surveyQuestion->question ?? '' }}
                            </td>
                            <td>
                                {{ $surveyQuestion->code ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $surveyQuestion->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $surveyQuestion->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $surveyQuestion->campaign->campaign ?? '' }}
                            </td>
                            <td>
                                @can('survey_question_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.survey-questions.show', $surveyQuestion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('survey_question_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.survey-questions.edit', $surveyQuestion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('survey_question_delete')
                                    <form action="{{ route('admin.survey-questions.destroy', $surveyQuestion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('survey_question_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.survey-questions.massDestroy') }}",
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
  let table = $('.datatable-SurveyQuestion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
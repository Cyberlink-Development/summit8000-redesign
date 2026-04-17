<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip FAQs </span>
            <a class="btn btn-primary pull-right add-faq" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_faq_body">

            <!-- <div class="row">
                <div class="col-md-2"><label>Ordering</label></div>
                <div class="col-md-8"><label>Title</label> </div>
                <div class="col-md-7"><label></label></div>
                <div class="col-md-1"></div>
            </div> -->

            @if ($faqs->count() > 0)
                @foreach ($faqs as $row)
                    <div class="row" id="faq-rec-{{ $loop->iteration }}">
                        <div class="col-md-2">
                            <label>Ordering</label>
                        </div>
                        <div class="col-md-10">
                            <label>Title</label>
                        </div>
                        <input type="hidden" name="faq_id[]" value="{{ $row->id }}" />
                        <div class="col-md-2">
                            <input type="number" min="1" max="2000" name="faq_ordering[]" value="{{ $row->ordering }}"
                                class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="faq_title[]" value="{{ $row->title }}" class="form-control"
                                placeholder="" />
                        </div>
                        <div class="col-md-10">
                            <label>Content</label>
                        </div>
                        <div class="col-md-9">
                            <!-- <input type="text" name="faq_content[]" value="{{ $row->content }}" class="form-control" placeholder="" /> -->
                            <textarea name="faq_content[]" class=" form-control my-editor"
                                placeholder="Content Goes Here"> {{ $row->content }} </textarea>
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-faq" faq-rowid="{{ $row->id }}"
                                faq-data-id="{{ $loop->iteration }}"><i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                        <br>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_faq_additional">
                <div class="row">
                    <div class="col-md-2">
                        <label>Ordering</label>
                    </div>
                    <div class="col-md-10">
                        <label>Title</label>
                    </div>
                    <input type="hidden" name="faq_id[]" value="" />
                    <div class="col-md-2"><input type="number" name="faq_ordering[]" class="form-control"
                            placeholder="" /></div>
                    <div class="col-md-8"><input type="text" name="faq_title[]" class="form-control"
                            placeholder="Title" />
                    </div>
                    <div class="col-md-7">
                        <label>Content</label>
                    </div>
                    <div class="col-md-9"><textarea type="text" name="faq_content[]" class="form-control"
                            placeholder="Content Goes here"></textarea>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-faq" faq-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
                <br>
            </div>
        </div>

    </div>
</div>

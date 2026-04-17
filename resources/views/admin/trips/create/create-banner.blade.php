<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Photo/Video </span>
            <a class="btn btn-primary pull-right add-banner" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_banner_body">
            <div class="row">
                <div class="col-md-1">
                    <label>Ordering</label>

                </div>
                <div class="col-md-3">
                    <label>Title</label>

                </div>
                <!--<div class="col-md-3">-->
                <!--    <label>Video</label>-->

                <!--</div>-->
                <div class="col-md-4">
                    <label>Thumbnail</label>

                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row" id="banner-rec-1">

            </div>
        </div>

        <div style="display:none;">
            <div id="row_banner_additional">
                <input type="hidden" name="banner_id[]" value="" />
                <div class="row">
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="banner_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-3"><input type="text" name="banner_title[]" class="form-control" placeholder="" />
                    </div>
                    <!--<div class="col-md-3"><input type="text" name="banner_video[]" class="form-control" placeholder="" />-->
                    <!--</div>-->
                    <div class="col-md-4"><input type="file" name="banner_banner[]" class="form-control" />
                     <small> (Width: 1600px Height: 1200px) </small>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-banner" schedule-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>

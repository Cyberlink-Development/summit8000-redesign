 <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Training Itinerary </span>
            <a class="btn btn-primary pull-right add-itinerary" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i> Add Row </a>
        </div>
        <div class="panel-body" id="row_body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-1"> <label>Ordering </label></div>
                <div class="col-md-1"> <label>Days</label></div>
                <div class="col-md-5"> <label>Title</label></div>
                <div class="col-md-2"> <label>Max Altitude</label></div>
                <!--<div class="col-md-2"> <label>Distance</label></div>-->
                <div class="col-md-2"> <label>Duration</label></div>
                <div class="col-md-1"> </div>
            </div>
            </div>
            <div class="row" id="rec-1">
            </div>
        </div>
 
        <div style="display:none;">
            <div id="row_additional">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="col-md-1"> <input type="number" min="1" max="2000" name="itinerary_ordering[]" class="form-control" placeholder="SN" /></div>
                            
                    <div class="col-md-1"><input type="text" name="itinerary_days[]" class="form-control" placeholder="Day" /></div>
                            
                    <div class="col-md-5"><input type="text" name="itinerary_title[]" class="form-control" placeholder="Title" /></div>
                            
                     <div class="col-md-2"><input type="text" name="itinerary_max_altitude[]" class="form-control" placeholder="Max Altitude" /></div>
                    
                     <!--<div class="col-md-2"><input type="text" name="itinerary_distance[]" class="form-control" placeholder="Distance" /></div>-->
                    
                     <div class="col-md-2"><input type="text" name="itinerary_duration[]" class="form-control" placeholder="Duration" /></div>
                    
                    <div class="col-md-1"><button class="btn btn-danger delete-itinerary" itinerary-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                    <div class="col-lg-12">
                    <div class="col-md-12"><textarea name="itinerary_content[]" class="form-control" placeholder="Content Goes Here" /></textarea></div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div>
        </div>


    </div>
</div>

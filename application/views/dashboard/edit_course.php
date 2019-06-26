<?php foreach ($course as $data){ ?>
    <input class="form-control" id="editID" name="editID" aria-describedby="editID" type="hidden" value="<?php echo $data->id; ?>">
    <input class="form-control" id="batchID" name="batchID" aria-describedby="batchID" type="hidden" value="<?php echo $data->batch_name; ?>">
    <input class="form-control" id="admin_auth" name="admin_auth" aria-describedby="admin_auth" type="hidden" value="base">
<input type="hidden" value="base" name="admin_auth">
<div class="modal-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <input class="form-control" id="batchTitle" name="batchTitle" aria-describedby="batchTitle" placeholder="Batch Title" type="text" value="<?php echo $data->batch_title; ?>">
            </div>
            <div class="form-group">
                <input class="form-control" id="batchName" name="batchName" aria-describedby="batchName" placeholder="Batch Name" type="text" value="<?php echo $data->batch_name; ?>">
            </div>
            <div class="form-group">
                <select class="form-control custom_bg" id="courseType" name="courseType">
                    <option value="0">Course Type</option>
                    <option value="1" <?php echo $data->course_type==1?"selected":""; ?>>Online</option>
                    <option value="2" <?php echo $data->course_type==2?"selected":""; ?>>Offline</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" id="courseDuration" name="courseDuration" aria-describedby="courseDuration" placeholder="Course Duration" type="text" value="<?php echo $data->duration; ?>">
            </div>
            <div class="form-group">
                <select class="form-control custom_bg" id="mentorName" name="mentorName">
                    <option value="0">Select Mentor</option>
                    <?php foreach ($mentors as $mentor){ ?>
                        <option value="<?php echo $mentor->mentor_name; ?>" <?php echo $mentor->mentor_name==$data->mentor_name?"selected":""; ?>><?php echo $mentor->mentor_name; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <textarea class="form-control" rows="3" id="summery" name="summery" placeholder="Summery"><?php echo $data->summery; ?></textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Update Course</button>
</div>
<?php } ?>
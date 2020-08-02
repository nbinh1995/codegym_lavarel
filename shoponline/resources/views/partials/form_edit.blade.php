<div class="modal-body">
    <input type="hidden" name="id" value="{{$item_edit->id ?? ''}}">
    <div class="form-group row">
        <label for="edit-name" class="col-sm-2 col-form-label   ">Tên Sản Phẩm<span class="required">*</span></label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="name" value='{{$item_edit->name ?? ''}}' id="edit-name"
                placeholder="Tên sản phẩm ..." required>
            {{-- <div class="valid-feedback">
                            </div> --}}
        </div>
    </div>
    <div class="form-row row">
        <div class="col-md-6 mb-3">
            <label for="edit-price">Giá Tiền<span class="required">*</span></label>
            <input type="number" value='{{$item_edit->price ?? ''}}' class="form-control" min="0" id="edit-price"
                name="price" value="" required>
            {{-- <div class="valid-feedback">
                                Looks good!
                            </div> --}}
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit-type">Thể Loại<span class="required">*</span></label>
            <select class="custom-select" id="edit-type" name="category_id" value='{{$item_edit->category_id ?? ''}}'
                required>
                <option disabled value="">Choose...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            {{-- <div class="invalid-feedback">
                                Please select a valid state.
                            </div> --}}
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="edit-desc">Mô tả sản phẩm</label>
        <textarea class="form-control " name='desc' id="edit-desc" placeholder="Mô tả sản phẩm ..." required>{{$item_edit->desc ?? ''}}
        </textarea>
        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
    </div>
    {{-- <div class="custom-file row mb-3">
                        <input type="file" class="custom-file-input" name='img' id="edit-img" required>
                        <label class="custom-file-label" for="edit-img">Chọn ảnh...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div> --}}
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save
        changes</button>
</div>
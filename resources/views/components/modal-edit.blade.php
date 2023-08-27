
                                                {{-- modal-edit --}}

                                                <div class="modal fade" id="edit-{{ $file->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editLabel">Update Data</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="editForm" action="{{ route('edit', $file) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-8 field">
                                                                            <div class="label">
                                                                                <label for="fname">First Name</label>
                                                                            </div>
                                                                            <input type="text" name="firstName"
                                                                                id="fname" class="form-control"
                                                                                value="{{ $file->firstName }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-8 field">
                                                                            <div class="label">
                                                                                <label for="lname">Last Name</label>
                                                                            </div>
                                                                            <input type="text" name="lastName"
                                                                                id="lname" class="form-control"
                                                                                value="{{ $file->lastName }}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-8 field">
                                                                            <div class="label">
                                                                                <label for="phone">Phone Number</label>
                                                                            </div>
                                                                            <input type="number" name="phone"
                                                                                id="phone" class="form-control"
                                                                                value="{{ $file->phone }}">
                                                                        </div>
                                                                    </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- modal-edit-end --}}
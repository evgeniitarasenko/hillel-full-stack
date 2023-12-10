<template>
    <div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-success mb-3">Add</button>

                    <ul id="todo-list" class="list-group">
                        <li>
                            <div>
                                <input class="form-check-input" type="checkbox" id="termsCheck">
                                todoItem.title
                            </div>
                            <div><small>todoItem.description</small></div>

                            <div>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="form-modal" class="modal d-block">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form" action="#" method="post">
                        <div class="modal-body">
                            <input id="form-uuid" type="hidden">

                            <label for="form-title" class="form-label">Title</label>
                            <input type="text" id="form-title" name="title" class="form-control">
                            <div id="form-title-invalid-feedback" class="invalid-feedback"></div>

                            <textarea class="form-control mt-2" placeholder="Description..."></textarea>

<!--                            <pre>{{filledTodoItem}}</pre>-->
<!--                            <pre>{{todoList}}</pre>-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Close</button>
                            <button type="button" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="remove-confirmation-modal" class="modal d-block" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="form" action="#" method="post">
                        <div class="modal-body">
                            Are you sure?
                            This item "deletedItem.title" will be deleted.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-success">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
}
</script>



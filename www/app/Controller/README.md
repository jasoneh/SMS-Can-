Controllers for a model are split up in two different classes

    ModelController and
    ModelAdminController

    ModelAdminController holds the admin specific controllers
    while the non-admin logic is in the non-admin-controller.

    ModelController extends ModelAdminController in order to make the admin functions accessible.
    ModelAdminController extends Controller as a regular controller.



    Find currently logged on user in the controller
    ================================================
    $user_id = AuthComponent::user('id');
(function( $ ) {

  const initComponent = () => {
    $.ajax({
      url: '/admin/get-user-manager',
      type: 'GET',
      success: function(response) {
        $('#users').html(response);
        initEvents();
      }
    });
  };

  const initEvents = () => {    
    showSelectedRoleEditorsEvent();
    hideUnusingRoleEditorEvent();
    changeUserRoleEvent();
    searchUsersEvent();
  };

  const searchUsersEvent = () => {
    let $search = $('#search-user');

    $search.change(function() {
      let searchWord = $search.val();
      $.ajax({
        url: '/admin/get-user-manager',
        type: 'GET',
        data: { searchWord },
        success: function(response) {
          $('#users').html(response);
          initEvents();
        }
      });
    });      
  };

  const hideRoleEditor = () => {
    $('.role-editor').hide();
    $('.user-info').find('td > span').show();
  };

  const hideUnusingRoleEditorEvent = () => {
    $(document).click(function(e) {
      if ( $('.user-info').has(e.target).length === 0 ) {
        hideRoleEditor();
      };
    });    
  };

  const showSelectedRoleEditorsEvent = () => {
    $('.open-role-editor').on('click', function(e) {
      e.preventDefault();      

      let 
          $idUser             = $(this).attr('id-user');
          $selectedRoleEditor = $('#role-editor-' + $idUser);
          $currentRoleInfo    = $('#role-info-' + $idUser);

      hideRoleEditor();
      $selectedRoleEditor.show();
      $currentRoleInfo.hide();
    });
  };

  const confirmUpdatingRole = (idUser, roleName) => {
    $.ajax({
      url: '/admin/change-role',
      type: 'GET',
      data: {
        roleName,
        idUser
      },
      success: function() {
        $('#role-info-' + idUser).find('.role-name').text(roleName);
      }
    });
  };

  const changeUserRoleEvent = () => {
    let $confirmNewRoleBtn = $('.confirm-new-role');

    $confirmNewRoleBtn.on('click', function() {

      let 
          $idUser  = $(this).attr('id-user');
          $newRole = $selectedRoleEditor.find('> select').val();

      confirmUpdatingRole( $idUser, $newRole );
      hideRoleEditor();
    });
  };



  $(document).ready(function() {
    initComponent();
  });

})( jQuery );
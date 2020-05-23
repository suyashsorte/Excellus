$(function() {
    $('#sendEmail').click(function() {
        var emailLink = $('#sendEmail');
        emailLink.attr('href', 'mailto:person1@rit.edu,person2@rit.edu,person3@rit.edu?subject=' + $('#subjectInput').val() + '&body=' + $('#msgInput').val() + '&nbsp;from&nbsp;' + $('#nameInput').val());
    })
});
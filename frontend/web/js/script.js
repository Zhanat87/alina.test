setAppModule();
function setAppModule()
{
    $('html').attr('ng-app', 'MyApp');
}
function getAjaxConfig()
{
    return ['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-Token'] = $('meta[name="csrf-token"]').attr("content");
        $httpProvider.defaults.headers.common['Accept'] = 'application/json, text/javascript';
        $httpProvider.defaults.headers.common['Content-Type'] = 'application/json; charset=utf-8';
    }];
}
function setErrorsForFormElement(className)
{
    var errors = '';
    for (var k in data.errors[i]) {
        errors += '<p class="ngInvalid pError">' + data.errors[i][k] + '</p>';
    }
    $('.' + className).removeClass('ng-valid').addClass('ngDirty').after(errors);
}
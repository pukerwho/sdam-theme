<?php
/*
Template Name: INDEX
*/
?>

<?php get_header(); ?>

<div class="container">

<script src="https://apis.google.com/js/api.js"></script>
<script>
  /**
   * Sample JavaScript code for searchconsole.urlInspection.index.inspect
   * See instructions for running APIs Explorer code samples locally:
   * https://developers.google.com/explorer-help/code-samples#javascript
   */

  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://www.googleapis.com/auth/webmasters https://www.googleapis.com/auth/webmasters.readonly"})
        .then(function() { console.log("Sign-in successful"); },
              function(err) { console.error("Error signing in", err); });
  }
  function loadClient() {
    gapi.client.setApiKey("AIzaSyCpwzKo42Xo5vc7g4FUiD2w0QeaZBvLXiU");
    return gapi.client.load("https://searchconsole.googleapis.com/$discovery/rest?version=v1")
        .then(function() { console.log("GAPI client loaded for API"); },
              function(err) { console.error("Error loading GAPI client for API", err); });
  }
  // Make sure the client is loaded and sign-in is complete before calling this method.
  function execute() {
    return gapi.client.searchconsole.urlInspection.index.inspect({
      "resource": {}
    })
        .then(function(response) {
                // Handle the results here (response.result has the parsed body).
                console.log("Response", response);
              },
              function(err) { console.error("Execute error", err); });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: "279696417147-q843ggciokbttb61mns5vkk13n64cp7e.apps.googleusercontent.com"});
  });
</script>
<button onclick="authenticate().then(loadClient)">authorize and load</button>
<button onclick="execute()">execute</button>

</div>

<?php get_footer(); ?>
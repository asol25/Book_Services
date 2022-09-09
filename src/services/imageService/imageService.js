const config = {
    apiKey: "AIzaSyDSEge0CQkRNhEhx-tcIdgIyLdgCW8BgAM",
    authDomain: "images-services-52149.firebaseapp.com",
    databaseURL: "https://images-services-52149.firebaseio.com",
    projectId: "images-services-52149",
    storageBucket: "gs://images-services-52149.appspot.com",
    messagingSenderId: "388061356865"
};
const app =  initializeApp(config);
const storage = app.storage();  
const defaultBucket  = storage.ref('images');

function uploadInfoPicture(event) {
    event.preventDefault();

    storage.Reference().put()
}
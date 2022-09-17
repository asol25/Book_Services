const config = {
    apiKey: "AIzaSyDSEge0CQkRNhEhx-tcIdgIyLdgCW8BgAM",
    authDomain: "images-services-52149.firebaseapp.com",
    databaseURL: "https://images-services-52149.firebaseio.com",
    projectId: "images-services-52149",
    storageBucket: "gs://images-services-52149.appspot.com",
    messagingSenderId: "388061356865"
};
const app = firebase.initializeApp(config);
const storage = app.storage();
const defaultBucket = storage.ref('images');

/**
* Handle submit events
* @param  {Event} event The event object
*/
function handleSubmit(event) {
    // Stop the form from reloading the page
    event.preventDefault();

    // If there's no file, do nothing
    if (!file.value.length) return;

    // Create a new FileReader() object
    let reader = new FileReader();

    // Read the file
    configCloudStorage(file.files[0]);
}

function configCloudStorage(path) {
    const timer = new Date().getTime();
    const picturePath = "images/image" + timer.toString();
    const storageRef = storage.ref(picturePath);

    const uploadTask = storageRef.put(path);

    uploadTask.on('state_changed', (snapshot) => {
        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log('Upload is ' + progress + '% done');
        switch (snapshot.state) {
            case firebase.storage.TaskState.PAUSED: // or 'paused'
                console.log('Upload is paused');
                break;
            case firebase.storage.TaskState.RUNNING: // or 'running'
                console.log('Upload is running');
                break;
        }
    }, (error) => {
        // Handle unsuccessful uploads
        console.log(error);
    }, () => {
        // Handle successful uploads on complete
        // For instance, get the download URL: https://firebasestorage.googleapis.com/...
        uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
            console.log('File available at', downloadURL);
        });
    });
}
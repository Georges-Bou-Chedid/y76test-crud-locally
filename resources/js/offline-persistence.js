import { enableIndexedDbPersistence } from "firebase/firestore"; 

enableIndexedDbPersistence(db)
  .catch((err) => {
      if (err.code == 'failed-precondition') {
          // Multiple tabs open, persistence can only be enabled
          // in one tab at a a time.
          // ...
      } else if (err.code == 'unimplemented') {
          // The current browser does not support all of the
          // features required to enable persistence
          // ...
      }
  });


import { disableNetwork } from "firebase/firestore"; 

await disableNetwork(db);
console.log("Network disabled!");
// Do offline actions
// ...

import React from 'react';
import ReactDOM from 'react-dom/client';

function MapView() {
    return (
        <div className="App">
            <Map/>
        </div>
    );
}

export default MapView;

if (document.getElementById('mmap')) {
    const Index = ReactDOM.createRoot(document.getElementById("mmap"));

    Index.render(
        <React.StrictMode>
            <MapView/>
        </React.StrictMode>
    )
}

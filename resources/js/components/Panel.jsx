import React from 'react';
import ReactDOM from 'react-dom/client';

function Panel() {
    return (
        <div className="">
            <div className="">
                <div className="col-md-12">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Panel;

if (document.getElementById('panel')) {
    const Index = ReactDOM.createRoot(document.getElementById("panel"));

    Index.render(
        <React.StrictMode>
            <Panel/>
        </React.StrictMode>
    )
}

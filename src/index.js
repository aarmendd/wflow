import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './components/App';

document.addEventListener( 'DOMContentLoaded', function() {
    const element = document.getElementById('root');
    const root = createRoot(element);
    if( typeof element !== 'undefined' && element !== null ) {
        root.render(<App />);
    }
} )





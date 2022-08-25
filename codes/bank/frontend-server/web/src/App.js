import Login from './Login';
import Home from './Home';
// import './App.css';
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";

function App() {
  return (
    <div className="App">
        <Routes>
          <Route exact path="/Login" element={<Login />} />
          <Route exact path="/" element={<Home />} />
        </Routes>
    </div>
  );
}

export default App;
import Login from './Login';
import Home from './Home';
// import './App.css';
import { Routes, Route, Link } from "react-router-dom";

function App() {
  return (
    <div className="App">
      <Routes>
        <Route path="/Login" element={<Login />} />
        <Route path="/" element={<Home />} />
      </Routes>
    </div>
  );
}

export default App;
"use client";

import React, { useState } from "react";
import { Row, Col, Form } from "react-bootstrap";

const Audiences = () => {
  const [gender, setGender] = useState("All");
  const [age, setAge] = useState(40); // Default age value set to 40
  const [locationTags, setLocationTags] = useState([]);
  const [mediaTags, setMediaTags] = useState([]);
  const [teamMemberTags, setTeamMemberTags] = useState([]);

  const handleGenderChange = (e) => {
    setGender(e.target.value);
  };

  const handleTagAddition = (e, setTags) => {
    if (e.key === "Enter" && e.target.value.trim()) {
      setTags((prev) => [...prev, e.target.value.trim()]);
      e.target.value = "";
    }
  };

  const renderTags = (tags) =>
    tags.map((tag, index) => (
      <span key={index} className="badge bg-primary me-1">
        {tag}
      </span>
    ));

  return (
    <div
      className="campaign-stepper-content m-auto"
      style={{ maxWidth: "625px" }}
    >
      <h3 className="fs-18 mb-4">Configure Audiences</h3>

      <Form>
        {/* Gender Section */}
        <div className="mb-5">
          <label className="fw-semibold mb-3">Gender</label>
          <Row>
            {["All", "Male", "Female"].map((g, index) => (
              <Col sm={4} className="mb-3 mb-sm-0" key={g}>
                <label htmlFor={`radio${index}`} className="custom-radio">
                  <input
                    type="radio"
                    className="form-check-input"
                    name="gender"
                    id={`radio${index}`}
                    value={g}
                    checked={gender === g}
                    onChange={handleGenderChange}
                  />
                  <div className="radio-content">
                    <span className="fw-medium text-secondary">{g}</span>
                  </div>
                </label>
              </Col>
            ))}
          </Row>
        </div>

        {/* Age Section */}
        <div className="mb-5">
          <div className="d-flex justify-content-between">
            <label className="fw-semibold mb-3">Age</label>
            <div className="text-center mt-2">Selected Age: {age}</div>
          </div>

          <Form.Range
            min={10}
            max={100}
            value={age}
            onChange={(e) => setAge(e.target.value)}
          />
        </div>

        {/* Location Section */}
        <div className="mb-5">
          <label className="fw-semibold mb-3">Location</label>
          <Form.Group className="mb-4">
            <div
              className="tag-container p-1 rounded-3 form-control h-auto bg-border-color"
              style={{ border: "2px dashed #5DA8FF" }}
            >
              {renderTags(locationTags)}
              <Form.Control
                type="text"
                className="border-0 bg-border-color"
                placeholder="Type and press Enter"
                onKeyDown={(e) => handleTagAddition(e, setLocationTags)}
              />
            </div>
          </Form.Group>
        </div>

        {/* Media Section */}
        <div className="mb-5">
          <label className="fw-semibold mb-3">Media</label>
          <Form.Group className="mb-4">
            <div
              className="tag-container p-1 rounded-3 form-control h-auto bg-border-color"
              style={{ border: "2px dashed #5DA8FF" }}
            >
              {renderTags(mediaTags)}
              <Form.Control
                type="text"
                className="border-0 bg-border-color"
                placeholder="Type and press Enter"
                onKeyDown={(e) => handleTagAddition(e, setMediaTags)}
              />
            </div>
          </Form.Group>
        </div>

        {/* Add Team Member Section */}
        <div className="mb-5">
          <label className="fw-semibold mb-3">Add Team Member</label>
          <Form.Group className="mb-4">
            <div
              className="tag-container p-1 rounded-3 form-control h-auto bg-border-color"
              style={{ border: "2px dashed #5DA8FF" }}
            >
              {renderTags(teamMemberTags)}
              <Form.Control
                type="text"
                className="border-0 bg-border-color"
                placeholder="Type and press Enter"
                onKeyDown={(e) => handleTagAddition(e, setTeamMemberTags)}
              />
            </div>
          </Form.Group>
        </div>
      </Form>
    </div>
  );
};

export default Audiences;

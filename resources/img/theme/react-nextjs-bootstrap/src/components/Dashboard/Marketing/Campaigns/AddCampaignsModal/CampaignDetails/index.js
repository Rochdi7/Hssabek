"use client";

import React, { useState } from "react";
import { Form } from "react-bootstrap";

const CampaignDetails = () => {
  const [image, setImage] = useState(null);

  // Handle image upload
  const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onloadend = () => {
        setImage(reader.result);
      };
      reader.readAsDataURL(file);
    }
  };

  //
  const [selectedGoal, setSelectedGoal] = useState("");

  const handleRadioChange = (e) => {
    setSelectedGoal(e.target.id);
  };

  return (
    <>
      <div
        style={{ maxWidth: "625px", marginLeft: "auto", marginRight: "auto" }}
      >
        <Form className="campaign-stepper-content">
          <h3 className="fs-18 mb-3 mb-md-5">Campaign Details</h3>

          <Form.Group className="mb-4 mb-md-5">
            <Form.Label className="fw-semibold mb-2">
              Campaign Name <span className="text-danger">*</span>
            </Form.Label>
            <Form.Control
              type="text"
              className="bg-border-color h-55 fs-16"
              placeholder="Christmas Eve"
            />
          </Form.Group>

          <Form.Group className="mb-4 mb-md-5">
            <Form.Label className="fw-semibold mb-2">
              Company Logo <span className="text-danger">*</span>
            </Form.Label>
            <div className="avatar-upload">
              <div className="avatar-edit">
                <Form.Control
                  type="file"
                  id="imageUpload"
                  accept=".png, .jpg, .jpeg"
                  className="form-control-file"
                  onChange={handleImageUpload}
                />
                <Form.Label htmlFor="imageUpload"></Form.Label>
              </div>
              <div className="avatar-preview">
                <div
                  id="imagePreview"
                  style={{
                    backgroundImage: image
                      ? `url(${image})`
                      : "url(https://angular.envytheme.com/trezo-mt/images/admin.png)",
                  }}
                ></div>
              </div>
            </div>
            <span className="fs-14 d-block mt-4">
              Allowed file types: png, jpg, jpeg
            </span>
          </Form.Group>

          <Form.Group className="mb-4 mb-md-5">
            <Form.Label className="fw-semibold mb-2">
              Campaign Goal <span className="text-danger">*</span>
            </Form.Label>

            <div className="form-check style mb-3 pb-3 p-0 border-bottom">
              <Form.Check
                type="radio"
                id="flexRadioDefault1"
                label="Get more visitors"
                checked={selectedGoal === "flexRadioDefault1"}
                onChange={handleRadioChange}
                className="p-0"
              />
              <span className="label-description d-block">
                Increase impression traffic onto the platform
              </span>
            </div>

            <div className="form-check style mb-3 pb-3 p-0 border-bottom">
              <Form.Check
                type="radio"
                id="flexRadioDefault2"
                label="Get more messages on chat"
                checked={selectedGoal === "flexRadioDefault2"}
                onChange={handleRadioChange}
                className="p-0"
              />
              <span className="label-description d-block">
                Increase community interaction and communication
              </span>
            </div>

            <div className="form-check style mb-3 pb-3 p-0 border-bottom">
              <Form.Check
                type="radio"
                id="flexRadioDefault3"
                label="Get more calls"
                checked={selectedGoal === "flexRadioDefault3"}
                onChange={handleRadioChange}
                className="p-0"
              />
              <span className="label-description d-block">
                Boost telecommunication feedback to provide precise and accurate
                information
              </span>
            </div>

            <div className="form-check style mb-3 pb-3 p-0 border-bottom">
              <Form.Check
                type="radio"
                id="flexRadioDefault4"
                label="Get more likes"
                checked={selectedGoal === "flexRadioDefault4"}
                onChange={handleRadioChange}
                className="p-0"
              />
              <span className="label-description d-block">
                Increase positive interactivity on social media platforms
              </span>
            </div>

            <div className="form-check style mb-3 pb-3 p-0 border-bottom">
              <Form.Check
                type="radio"
                id="flexRadioDefault5"
                label="Lead generation"
                checked={selectedGoal === "flexRadioDefault5"}
                onChange={handleRadioChange}
                className="p-0"
              />
              <span className="label-description d-block">
                Collect contact information for potential customers
              </span>
            </div>
          </Form.Group>
        </Form>
      </div>
    </>
  );
};

export default CampaignDetails;

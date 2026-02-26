"use client";

import { Card } from "react-bootstrap";

const SingleFileUpload = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">Single File Upload</h4>

          <div className="form-group mb-4"> 
            <div className="form-control h-100 text-center position-relative p-4 p-lg-5">
              <div className="product-upload">
                <label htmlFor="file-upload" className="file-upload mb-0">
                  <i className="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>

                  <span className="d-block text-body fs-14">
                    Drag and drop an image or{" "}
                    <span className="text-primary text-decoration-underline">
                      Browse
                    </span>
                  </span>
                </label>

                <input id="file-upload" type="file" />
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SingleFileUpload;

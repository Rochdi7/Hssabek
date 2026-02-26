"use client";

import { useState } from "react";
import { Row, Col, Form, Button } from "react-bootstrap";
import Image from "next/image";

const ManageYourNft = () => {
  // Modal
  const [isShowModal, setShowModal] = useState(true);
  const handleToggleShowModal = () => {
    setShowModal(!isShowModal);
  };

  // File upload
  const [files, setFiles] = useState([]);

  const handleFileChange = (event) => {
    const selectedFiles = Array.from(event.target.files); // Convert FileList to Array
    setFiles(selectedFiles);
  };

  return (
    <>
      <div
        className="rounded-3 position-relative z-0 manage-nft mb-4"
        style={{
          background: "linear-gradient(92deg, #23272E 7.31%, #3F5272 97.89%)",
          padding: "60px 40px",
        }}
      >
        <div className="d-flex flex-wrap gap-2 align-items-center">
          <div className="flex-grow-1 me-3">
            <Image
              src="/images/shape-8.png"
              className="position-absolute top-0 end-0"
              alt="shape"
              width={210}
              height={180}
            />

            <h3 className="fs-28 text-white">Manage Your NFT From One Place</h3>

            <p style={{ color: "#B1BBC8" }}>
              The world’s first and largest digital marketplace for discover,
              collect, sell and create your own NFTs.
            </p>
          </div>

          <div className="flex-shrink-0">
            <button
              className="btn btn-primary py-2 p-4 position-relative"
              onClick={handleToggleShowModal}
            >
              Create NFT
            </button>
          </div>
        </div>
      </div>

      {/* Modal */}
      <div
        className={`custom-modal center p-lg-5 ${isShowModal ? "" : "show"}`}
      >
        <div className="custom-modal-content position-relative z-3 w-100">
          <div
            className="custom-modal-header border-0 p-4 p-md-5 pb-0 d-flex align-items-center justify-content-between position-sticky z-3"
            style={{ top: "0" }}
          >
            <h3 className="fs-24 mb-0">Create NFT</h3>

            <div className="close-link" onClick={handleToggleShowModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4 p-md-5">
            <Form className="m-auto" style={{ maxWidth: "1208px" }}>
              <h3 className="fs-18 mb-4">
                Upload Image, Video, Audio, or 3D Model
              </h3>

              <div className="mb-4">
                <div
                  className="d-flex align-items-center bg-border-color p-4 rounded-2 position-relative"
                  style={{ border: "2px dashed #5DA8FF" }}
                >
                  <Image
                    src="/images/upload.png"
                    alt="upload"
                    width={46}
                    height={46}
                  />
                  <div className="ms-3">
                    <h4 className="fs-16">
                      Drop campaign files here or click to upload.
                    </h4>
                    <p>Upload up to 12 files, max size each file: 5MB.</p>
                  </div>
                  <Form.Control
                    type="file"
                    multiple
                    className="position-absolute opacity-0"
                    style={{
                      cursor: "pointer",
                      top: 0,
                      bottom: 0,
                      left: 0,
                      right: 0,
                    }}
                    onChange={handleFileChange}
                  />
                </div>

                {files.length > 0 && (
                  <div className="mt-3">
                    <h5 className="fs-16 mb-2">Selected Files:</h5>
                    <ul>
                      {files.map((file, index) => (
                        <li key={index} className="mb-1">
                          {file.name} - {(file.size / 1024 / 1024).toFixed(2)}{" "}
                          MB
                        </li>
                      ))}
                    </ul>
                  </div>
                )}
              </div>

              <Form.Group className="mb-4">
                <Form.Label>
                  Product Name <span className="text-danger">*</span>
                </Form.Label>
                <Form.Control
                  type="text"
                  placeholder="Christmas Eve"
                  className="bg-border-color h-55 fs-16"
                />
              </Form.Group>

              <Form.Group className="mb-4">
                <Form.Label>Description</Form.Label>
                <Form.Control
                  as="textarea"
                  rows={5}
                  placeholder="Enter Description"
                  className="bg-border-color fs-16"
                />
              </Form.Group>

              <Row className="mb-4">
                <Col lg={4}>
                  <Form.Group>
                    <Form.Label>Item Price</Form.Label>
                    <Form.Control
                      type="text"
                      placeholder="12.50 ETH"
                      className="bg-border-color h-55 fs-16"
                    />
                  </Form.Group>
                </Col>

                <Col lg={4}>
                  <Form.Group>
                    <Form.Label>Size</Form.Label>
                    <Form.Control
                      type="text"
                      placeholder="2.50 MB"
                      className="bg-border-color h-55 fs-16"
                    />
                  </Form.Group>
                </Col>

                <Col lg={4}>
                  <Form.Group>
                    <Form.Label>Properties</Form.Label>
                    <Form.Control
                      type="text"
                      placeholder="Enter Link"
                      className="bg-border-color h-55 fs-16"
                    />
                  </Form.Group>
                </Col>
              </Row>

              <Form.Group className="mb-4">
                <Form.Label>External Link</Form.Label>
                <Form.Control
                  as="textarea"
                  rows={5}
                  placeholder="Enter Link"
                  className="bg-border-color fs-16"
                />
              </Form.Group>

              <div className="d-flex flex-wrap gap-3 mb-4">
                <Form.Check
                  type="radio"
                  label="Put On Sale"
                  name="saleOptions"
                  id="saleOption1"
                  defaultChecked
                />
                <Form.Check
                  type="radio"
                  label="Instant Sale Price"
                  name="saleOptions"
                  id="saleOption2"
                />
                <Form.Check
                  type="radio"
                  label="Unlock Once Purchased"
                  name="saleOptions"
                  id="saleOption3"
                />
              </div>

              <div className="d-flex justify-content-end">
                <Button variant="primary" className="py-2 px-4">
                  Create NFT
                </Button>
              </div>
            </Form>
          </div>
        </div>

        <div className="close-outside" onClick={handleToggleShowModal}></div>
      </div>
    </>
  );
};

export default ManageYourNft;

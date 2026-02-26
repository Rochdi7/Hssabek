"use client";

import React from "react";
import { Form, Dropdown } from "react-bootstrap";
import Image from "next/image";

const CreativeUploads = () => {
  return (
    <>
      <div
        style={{ maxWidth: "625px", marginLeft: "auto", marginRight: "auto" }}
      >
        <Form className="campaign-stepper-content">
          <h3 className="fs-18 mb-4">Upload Files</h3>

          <div className="mb-5 only-file-upload">
            <div
              className="d-flex align-items-center position-relative z-1 bg-border-color p-4 rounded-2"
              style={{ border: "2px dashed #5DA8FF" }}
            >
              <div className="flex-shrink-0">
                <Image
                  src="/images/upload.png"
                  alt="upload"
                  width={46}
                  height={46}
                />
              </div>

              <div className="flex-grow-1 ms-3">
                <h4 className="fs-16">
                  Drop campaign files here or click to upload.
                </h4>
                <p>Upload upto 12 files, max size each file: 5MB.</p>
              </div>

              <label
                className="position-absolute top-0 bottom-0 start-0 end-0 cursor"
                id="upload-container"
              >
                <input
                  className="form__file bottom-0"
                  id="upload-files"
                  type="file"
                  multiple="multiple"
                />
              </label>
            </div> 
          </div>

          <h3 className="fs-18 mb-4">Uploaded Files</h3>

          <div className="mb-5">
            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom pb-4 mb-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/pdf.png"
                    alt="pdf"
                    width={35}
                    height={35}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <h4 className="fs-16 mb-0">Campaign Requirements</h4>
                  <p>Increase impression traffic onto the platform</p>
                </div>
              </div>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  className="btn p-2 bg-border-color d-flex align-items-center"
                  type="button"
                >
                  <div className="fs-15 text-body">Edit</div>
                  <i className="ri-arrow-down-s-line lh-1"></i>
                </Dropdown.Toggle>

                <Dropdown.Menu className="ddropdown-menu-end bg-white border box-shadow">
                  <Dropdown.Item>
                    <i className="ri-edit-line"></i>
                    Edit
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-eye-fill"></i>
                    View
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-delete-bin-line"></i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>

            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom pb-4 mb-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/doc.png"
                    alt="doc"
                    width={35}
                    height={35}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <h4 className="fs-16 mb-0">Campaign’s mission and vision</h4>
                  <p>Increase impression traffic onto the platform</p>
                </div>
              </div>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  className="btn p-2 bg-border-color d-flex align-items-center"
                  type="button"
                >
                  <div className="fs-15 text-body">Edit</div>
                  <i className="ri-arrow-down-s-line lh-1"></i>
                </Dropdown.Toggle>

                <Dropdown.Menu className="ddropdown-menu-end bg-white border box-shadow">
                  <Dropdown.Item>
                    <i className="ri-edit-line"></i>
                    Edit
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-eye-fill"></i>
                    View
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-delete-bin-line"></i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>

            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom pb-4 mb-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/xl4.png"
                    alt="xl4"
                    width={35}
                    height={35}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <h4 className="fs-16 mb-0">Campaign Banner</h4>
                  <p>Increase impression traffic onto the platform</p>
                </div>
              </div>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  className="btn p-2 bg-border-color d-flex align-items-center"
                  type="button"
                >
                  <div className="fs-15 text-body">Edit</div>
                  <i className="ri-arrow-down-s-line lh-1"></i>
                </Dropdown.Toggle>

                <Dropdown.Menu className="ddropdown-menu-end bg-white border box-shadow">
                  <Dropdown.Item>
                    <i className="ri-edit-line"></i>
                    Edit
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-eye-fill"></i>
                    View
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-delete-bin-line"></i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>

            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom pb-4 mb-4">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/jpg.png"
                    alt="pdf"
                    width={35}
                    height={35}
                  />
                </div>
                <div className="flex-grow-1 ms-3">
                  <h4 className="fs-16 mb-0">Campaign Image</h4>
                  <p>Increase impression traffic onto the platform</p>
                </div>
              </div>

              <Dropdown className="action-opt">
                <Dropdown.Toggle
                  className="btn p-2 bg-border-color d-flex align-items-center"
                  type="button"
                >
                  <div className="fs-15 text-body">Edit</div>
                  <i className="ri-arrow-down-s-line lh-1"></i>
                </Dropdown.Toggle>

                <Dropdown.Menu className="ddropdown-menu-end bg-white border box-shadow">
                  <Dropdown.Item>
                    <i className="ri-edit-line"></i>
                    Edit
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-eye-fill"></i>
                    View
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <i className="ri-delete-bin-line"></i>
                    Delete
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>
            </div>
          </div>
        </Form>
      </div>
    </>
  );
};

export default CreativeUploads;

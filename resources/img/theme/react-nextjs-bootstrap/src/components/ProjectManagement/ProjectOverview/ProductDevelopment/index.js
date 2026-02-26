"use client";

import { Card, ProgressBar } from "react-bootstrap";

const ProductDevelopment = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="fs-18 mb-3">Shopify Theme Development</h3>
          <div className="bg-primary p-4 rounded-3 mb-2">
            <div className="d-flex justify-content-between flex-wrap gap-3">
              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <span
                    className="material-symbols-outlined fs-25 wh-45 lh-45 text-white text-center rounded-circle"
                    style={{ backgroundColor: "#4936F5" }}
                  >
                    for_you
                  </span>
                </div>
                <div className="flex-grow-1 ms-2 position-relative">
                  <span className="fw-medium text-white d-block mb-1">
                    Client
                  </span>
                  <h4 className="fs-16 text-white mb-0">Innovatech</h4>
                </div>
              </div>

              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <span
                    className="material-symbols-outlined fs-25 wh-45 lh-45 text-white text-center rounded-circle"
                    style={{ backgroundColor: "#4936F5" }}
                  >
                    attach_money
                  </span>
                </div>
                <div className="flex-grow-1 ms-2 position-relative">
                  <span className="fw-medium text-white d-block mb-1">
                    Budget
                  </span>
                  <h4 className="fs-16 text-white mb-0">$25,500</h4>
                </div>
              </div>

              <div className="d-flex align-items-center">
                <div className="flex-shrink-0">
                  <span
                    className="material-symbols-outlined fs-25 wh-45 lh-45 text-white text-center rounded-circle"
                    style={{ backgroundColor: "#4936F5" }}
                  >
                    timer
                  </span>
                </div>
                <div className="flex-grow-1 ms-2 position-relative">
                  <span className="fw-medium text-white d-block mb-1">
                    Duration
                  </span>
                  <h4 className="fs-16 text-white mb-0">360 hrs</h4>
                </div>
              </div>
            </div>

            <div className="mt-4">
              <ProgressBar
                variant="danger"
                now={65}
                style={{
                  height: "7px",
                }}
              />

              <div className="d-flex justify-content-between mt-2">
                <span className="fw-medium d-block text-body-bg">Progress</span>
                <span className="fw-medium d-block text-body-bg">65%</span>
              </div>
            </div>
          </div>

          <div className="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <span>Project Started: Mar 01, 2024</span>
            <span>Project Deadline: Jun 25, 2024</span>
          </div>

          <h4 className="fs-14">Project Details</h4>
          <p>
            Vestibulum euismod nisi vitae orci placerat, vitae vehicula eros
            dictum. Phasellus ut pharetra felis. Nulla facilisi. Nullam congue
            semper nunc, at sodales magna laoreet id. Nullam et lacus vitae
            ligula pretium suscipit. Fusce nec viverra enim. Sed feugiat gravida
            nibh sit amet suscipit. Integer tempor sapien eget metus lacinia,
            nec finibus lacus tincidunt. Sed sodales tellus nec metus aliquam,
            nec dignissim arcu lobortis.
          </p>

          <ul className="mb-0">
            <li className="mb-2">
              Outline the boundaries and deliverables of the project.
            </li>
            <li className="mb-2">
              List team members, their roles, and responsibilities.
            </li>
            <li className="mb-2">
              Specify the technology stack and tools to be used for development.
            </li>
            <li className="mb-2">
              Break down the project into manageable phases or sprints.
            </li>
            <li className="mb-0">
              Outline the design phase, including wireframing, prototyping
            </li>
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default ProductDevelopment;

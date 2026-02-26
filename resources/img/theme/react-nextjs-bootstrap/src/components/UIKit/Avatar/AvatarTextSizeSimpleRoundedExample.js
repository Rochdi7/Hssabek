"use client";

import { Card } from "react-bootstrap";

const AvatarTextSizeSimpleRoundedExample = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h4 className="fs-18 mb-4">
            Avatar Text Size Simple Rounded Example
          </h4>

          <div className="d-flex align-items-center gap-4 flex-wrap">
            <div className="wh-87 rounded-3 position-relative text-center bg-primary bg-opacity-10">
              <span className="fs-3 text-primary fw-semibold position-absolute top-50 start-50 translate-middle">
                Ab
              </span>
            </div>
            <div className="wh-77 rounded-3 position-relative text-center bg-primary bg-opacity-10">
              <span className="fs-24 text-primary fw-semibold position-absolute top-50 start-50 translate-middle">
                Ab
              </span>
            </div>
            <div className="wh-67 rounded-3 position-relative text-center bg-primary bg-opacity-10">
              <span className="fs-20 text-primary fw-semibold position-absolute top-50 start-50 translate-middle">
                Ab
              </span>
            </div>
            <div className="wh-57 rounded-3 position-relative text-center bg-primary bg-opacity-10">
              <span className="fs-16 text-primary fw-semibold position-absolute top-50 start-50 translate-middle">
                Ab
              </span>
            </div>
            <div className="wh-47 rounded-3 position-relative text-center bg-primary bg-opacity-10">
              <span className="fs-14 text-primary fw-semibold position-absolute top-50 start-50 translate-middle">
                Ab
              </span>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default AvatarTextSizeSimpleRoundedExample;

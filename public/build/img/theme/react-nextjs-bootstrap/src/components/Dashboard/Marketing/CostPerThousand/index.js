"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const CostPerThousand = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex">
            <div className="flex-grow-1 me-3">
              <span className="d-block mb-1">Cost Per Thousand</span>
              <h2 className="text-secondary fs-32">$3.95</h2>
              <span className="d-inline-block bg-danger bg-opacity-10 border-danger border px-2 rounded-pill text-danger mb-1 fs-12 fw-medium">
                -1.4%
              </span>
              <p className="fs-12">vs previous 30 days</p>
            </div>
            <div className="flex-shrink-0">
              <Image
                src="/images/video-advertising.gif"
                alt="video-advertising"
                width={60}
                height={60}
              />
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CostPerThousand;

"use client";

import { Row, Col } from "react-bootstrap";
import Image from "next/image";

const ActiveTotalProperty = () => {
  return (
    <>
      <div
        className="border-0 rounded-3 position-relative mb-4 overflow-hidden"
        style={{
          background: "linear-gradient(101deg, #FE7A36 0%, #FD5812 100%)",
        }}
      >
        <Row>
          <Col sm={7}>
            <div className="p-4 pe-0">
              <span className="text-white d-block mb-2">
                Active Total Property
              </span>
              <h3 className="fs-20 text-white">507,020</h3>
            </div>
          </Col>

          <Col sm={5} className="mt-md-3 mt-xxl-0">
            <div className="pt-sm-4 mt-sm-3 text-end">
              <Image
                src="/images/real-property.png"
                alt="real-property"
                width={188}
                height={125}
              />
              <Image
                src="/images/shape-9.png"
                className="position-absolute bottom-0 start-0"
                alt="shape"
                width={130}
                height={107}
              />
            </div>
          </Col>
        </Row>
      </div>
    </>
  );
};

export default ActiveTotalProperty;

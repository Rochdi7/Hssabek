"use client";

import Image from "next/image";
import { Row, Col, Card } from "react-bootstrap";

const Welcome = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 overflow-hidden position-relative mb-4 for-rtl-beauty"
        style={{
          background: "linear-gradient(90deg, #EAB9D2 0%, #EBA2C7 100%)",
        }}
      >
        <Row className="align-items-end">
          <Col sm={7}>
            <div className="p-4 py-5">
              <div className="py-4">
                <span className="fs-18 d-block mb-3 text-000">
                  Hello Joanna!
                </span>
                <h3 className="fs-28 fw-900 mb-4 text-000">
                  Welcome To Your Beauty Lounge
                </h3>
                <p className="text-000">You have 15.7% more bookings today.</p>
              </div>
            </div>
          </Col>

          <Col sm={5}>
            <div className="p-3 pb-0 ps-0 text-end">
              <Image
                src="/images/beauty-salon.png"
                alt="beauty-salon"
                width={243}
                height={270}
              />
            </div>
          </Col>
        </Row>

        <Image
          src="/images/shape-13.png"
          className="position-absolute top-0 start-0 p-5 px-4"
          alt="shape"
          width={100}
          height={100}
        />
      </Card>
    </>
  );
};

export default Welcome;

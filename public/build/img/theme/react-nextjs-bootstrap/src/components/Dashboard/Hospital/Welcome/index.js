"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";

const Welcome = () => {
  return (
    <>
      <Card
        className="border-0 rounded-3 welcome-box mb-4 position-relative z-0 overflow-hidden"
        style={{ backgroundColor: "#4936F5" }}
      >
        <Card.Body className="p-4">
          <Row className="align-items-center">
            <Col xs={12} sm={6} lg={9} xl={8} xxl={7}>
              <div
                className="border-bottom"
                style={{
                  border: "0 !important",
                  paddingBottom: "35px",
                }}
              >
                <h3 className="text-white fw-semibold mb-1 fs-20">
                  Hi, <span style={{ color: "#FFE8D4" }}>Dr. Olivia!</span>
                </h3>
                <p className="text-body-bg">Your schedule today</p>
              </div>

              <div className="d-flex align-items-center flex-wrap gap-3 gap-xl-4">
                <div className="d-flex align-items-center welcome-status-item">
                  <div className="flex-shrink-0">
                    <span className="material-symbols-outlined icon-bg">
                      airplay
                    </span>
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h5 className="text-white fw-semibold mb-0 fs-18">320</h5>
                    <p className="text-light">Patients</p>
                  </div>
                </div>

                <div className="d-flex align-items-center welcome-status-item">
                  <div className="flex-shrink-0">
                    <span
                      className="material-symbols-outlined text-primary-div"
                      style={{ backgroundColor: "#F3E8FF" }}
                    >
                      local_library
                    </span>
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <h5 className="text-white fw-semibold mb-0 fs-18">18</h5>
                    <p className="text-light">Surgeries</p>
                  </div>
                </div>
              </div>
            </Col>

            <Col xs={12} sm={6} lg={3} xl={4} xxl={5}>
              <div className="welcome-img text-center text-sm-end mt-4 mt-sm-0">
                <Image
                  src="/images/dr-olivia.png"
                  alt="welcome"
                  width={152}
                  height={173}
                />
              </div>
            </Col>
          </Row>
        </Card.Body>

        <Image
          src="/images/shape-7.png"
          className="position-absolute top-50 end-0 translate-middle-y z-n1 h-100"
          alt="shape"
          width={170}
          height={218}
        />
      </Card>
    </>
  );
};

export default Welcome;

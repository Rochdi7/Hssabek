"use client";

import { Card, Row, Col } from "react-bootstrap";
import Image from "next/image";  
import AddCardModal from "./AddCardModal";

const DebitCard = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4 pb-0">
          <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
            <h3 className="mb-0">Card</h3>
 
            <AddCardModal />
          </div>

          <Row>
            <Col sm={6} className="mb-4">
              <div
                className="bg-img p-4 rounded-3"
                style={{ backgroundImage: "url(/images/debit-card.png)" }}
              >
                <div className="d-flex align-content-center justify-content-between mb-4">
                  <span className="text-white fs-12 fw-medium">Debit Card</span>
                  <Image
                    src="/images/debit.svg"
                    alt="debit"
                    width={22}
                    height={16}
                  />
                </div>

                <Image
                  className="mb-4"
                  src="/images/board-1.png"
                  alt="board"
                  width={45}
                  height={30}
                />

                <h3 className="fw-semibold text-white mb-5 pb-md-4 d-flex gap-3">
                  <span className="text-white">5322</span>
                  <span className="text-white">0520</span>
                  <span className="text-white">0744</span>
                  <span className="text-white">1794</span>
                </h3>

                <div className="d-flex align-content-center justify-content-between">
                  <span className="text-white">David Farrior</span>
                  <span className="text-white fs-12 fw-medium">
                    EXP : 12/30
                  </span>
                </div>
              </div>
            </Col>

            <Col sm={6} className="mb-4">
              <div
                className="bg-img p-4 rounded-3"
                style={{
                  backgroundImage: "url(/images/virtual-card.png)",
                }}
              >
                <div className="d-flex align-content-center justify-content-between mb-4">
                  <span className="text-white fs-12 fw-medium">Debit Card</span>
                  <Image
                    src="/images/virtual.svg"
                    alt="debit"
                    width={22}
                    height={16}
                  />
                </div>

                <Image
                  className="mb-4"
                  src="/images/board-1.png"
                  alt="board"
                  width={45}
                  height={30}
                />

                <h3 className="fw-semibold text-white mb-5 pb-md-4 d-flex gap-3">
                  <span className="text-white">....</span>
                  <span className="text-white">....</span>
                  <span className="text-white">....</span>
                  <span className="text-white">1794</span>
                </h3>

                <div className="d-flex align-content-center justify-content-between">
                  <span className="text-white">David Farrior</span>
                  <span className="text-white fs-12 fw-medium">
                    EXP : 12/30
                  </span>
                </div>
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default DebitCard;

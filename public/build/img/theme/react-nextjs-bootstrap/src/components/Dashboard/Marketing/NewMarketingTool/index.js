"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const NewMarketingTool = () => {
  return (
    <>
      <div
        className="p-4 rounded-3 mb-4 text-center"
        style={{
          background: "linear-gradient(162deg, #D7B5FD 3.82%, #9947F5 98.54%",
        }}
      >
        <Card.Body className="text-center">
          <span className="fs-24 d-block text-secondary">Want To Try</span>

          <h3 className="fs-24 text-secondary">
            New Marketing <br /> Tool?
          </h3>

          <div className="py-4 mb-3">
            <Image
              src="/images/marketing-tool.png"
              alt="marketing-tool"
              width={244}
              height={212}
            />
          </div>

          <a
            href="#"
            className="d-inline-block py-2 px-4 btn btn-primary border-0"
            style={{ backgroundColor: "#6A22A7" }}
          >
            Contact Us
          </a>
        </Card.Body>
      </div>
    </>
  );
};

export default NewMarketingTool;

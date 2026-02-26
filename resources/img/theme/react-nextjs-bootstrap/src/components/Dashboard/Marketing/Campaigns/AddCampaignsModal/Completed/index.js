"use client";

import React from "react"; 
import Image from "next/image";
import { Button } from "react-bootstrap";

const Completed = () => {
  return (
    <>
      <div
        className="campaign-stepper-content m-auto text-center mb-5"
        style={{ maxWidth: "625px" }}
      >
        <div className="mb-4">
          <Image
            src="/images/interface-welcome.png"
            alt="interface-welcome"
            width={308}
            height={308}
          />
        </div>

        <h3 className="fs-24 mb-3">Campaign Completed!</h3>

        <p className="mx-auto mb-4" style={{ maxWidth: "463px" }}>
          You will receive an email with with the summary of your newly created
          campaign!
        </p>

        <div className="d-flex flex-wrap justify-content-center gap-2 gap-sm-4">
          <Button className="btn btn-secondary">
            Create New Campaign{" "}
            <i className="ri-arrow-right-line text-white"></i>
          </Button>

          <Button className="btn btn-primary">
            View Campaign <i className="ri-arrow-right-line text-white"></i>
          </Button>
        </div>
      </div>
    </>
  );
};

export default Completed;

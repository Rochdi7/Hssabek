"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";
import Nav from "./Nav";
import Followers from "./Followers";
import MyProjects from "./MyProjects";

const Profile = () => {
  return (
    <>
      <div className="position-relative">
        <Image
          src="/images/profile-bg.jpg"
          className="rounded-top-3"
          alt="profile-bg"
          width={1600}
          height={400}
        />
        <div
          className="position-absolute for-rtl-position"
          style={{
            bottom: '25px',
            right: '25px',
          }}
        >
          <button
            type="button"
            className="btn btn-outline-light text-white hover rounded-2"
          >
            Update Cover Photo
          </button>
        </div>
      </div>

      <Card className="bg-white border-0 rounded-3 mb-4 rounded-top-0">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-3">
            <div className="d-flex align-items-end">
              <div className="flex-shrink-0 position-relative mt-minus-110">
                <Image
                  src="/images/user-68.jpg"
                  className="rounded-circle border border-2 wh-160"
                  alt="user"
                  width={160}
                  height={160}
                />
                <Image
                  src="/images/check.svg"
                  className="position-absolute bottom-0 end-0"
                  alt="check"
                  width={50}
                  height={50}
                />
              </div>
              <div className="flex-grow-1 ms-3">
                <h4 className="fs-24 mb-1">Alice Johnson</h4>
                <span className="fs-15 fw-medium">Product designer</span>
              </div>
            </div>

            <div className="d-flex align-items-center">
              <button
                type="button"
                className="btn btn-outline-light text-body fw-medium fs-16 px-4 hover hover-bg"
              >
                <i className="ri-edit-line fw-medium fs-18 me-1"></i>
                <span>Edit</span>
              </button>

              <button type="button" className="btn btn-primary fw-medium fs-16 px-4 ms-3">
                <i className="ri-share-fill fw-medium fs-18 me-1"></i>
                <span>Share</span>
              </button>
            </div>
          </div>
        </Card.Body>
      </Card>

      <Nav />

      <Row>
        <Col md={7} lg={8}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom pb-4 mb-4">
                <h4 className="fs-18 mb-0">About Me</h4> 
              </div>

              <h4 className="fs-16 fw-medium mb-2">Introduction</h4>
              <p className="mb-4">
                Alice Johnson, a visionary UX/UI designer, blends creativity
                with user-centric design principles to craft seamless digital
                experiences. With a passion for innovation and a knack for
                understanding user needs, [Your Name] has become a driving force
                in the ever-evolving landscape of digital design. This 5000-word
                biography aims to delve into Alice journey, from humble
                beginnings to becoming a recognized name in the realm of user
                experience and interface design.
              </p>

              <h4 className="fs-16 fw-medium mb-2">Professional Beginnings</h4>
              <p className="mb-4">
                Upon graduating, Alice embarked on their professional journey,
                eager to make an impact in the world of design. They initially
                gained experience working at VivoTech, where they collaborated
                with cross-functional teams to deliver user-centric solutions
                for various clients. This early exposure provided invaluable
                insights into the complexities of design processes and
                solidified Alice commitment to enhancing user experiences.
              </p>

              <h4 className="fs-16 fw-medium mb-2 pb-1">
                Expertise in UX/UI Design
              </h4>
              <p>
                Driven by a desire for continuous growth, Alice delved deeper
                into the nuances of UX/UI design, staying abreast of emerging
                trends, technologies, and methodologies. They immersed
                themselves in user research, wireframing, prototyping, and
                usability testing, refining their craft with each project.
              </p>
            </Card.Body>
          </Card>
        </Col>

        <Col md={5} lg={4}>
          <Followers />
        </Col>
      </Row>

      <MyProjects />
    </>
  );
};

export default Profile;

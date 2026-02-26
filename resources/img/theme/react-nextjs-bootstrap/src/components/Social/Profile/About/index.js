"use client";

import { Card } from "react-bootstrap";

const About = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 border-bottom pb-4 mb-4">
            <h4 className="fs-18 mb-0">About Me</h4>
          </div>

          <h4 className="fs-16 fw-medium mb-2">Introduction</h4>
          <p className="mb-4">
            Alice Johnson, a visionary UX/UI designer, blends creativity with
            user-centric design principles to craft seamless digital
            experiences. With a passion for innovation and a knack for
            understanding user needs, [Your Name] has become a driving force in
            the ever-evolving landscape of digital design. This 5000-word
            biography aims to delve into Alice journey, from humble beginnings
            to becoming a recognized name in the realm of user experience and
            interface design.
          </p>

          <h4 className="fs-16 fw-medium mb-2">Professional Beginnings</h4>
          <p className="mb-4">
            Upon graduating, Alice embarked on their professional journey, eager
            to make an impact in the world of design. They initially gained
            experience working at VivoTech, where they collaborated with
            cross-functional teams to deliver user-centric solutions for various
            clients. This early exposure provided invaluable insights into the
            complexities of design processes and solidified Alice commitment to
            enhancing user experiences.
          </p>

          <h4 className="fs-16 fw-medium mb-2 pb-1">
            Expertise in UX/UI Design
          </h4>
          <p>
            Driven by a desire for continuous growth, Alice delved deeper into
            the nuances of UX/UI design, staying abreast of emerging trends,
            technologies, and methodologies. They immersed themselves in user
            research, wireframing, prototyping, and usability testing, refining
            their craft with each project.
          </p>
        </Card.Body>
      </Card>
    </>
  );
};

export default About;

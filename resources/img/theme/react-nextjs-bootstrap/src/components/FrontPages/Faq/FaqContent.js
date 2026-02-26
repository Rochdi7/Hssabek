"use client";

import { Accordion } from "react-bootstrap";

const FaqContent = () => {
  return (
    <>
      <div className="faq-area position-relative z-1 pt-125">
        <div className="container">
          <div className="section-title mw-630">
            <span className="top-title">
              <span>FAQ’s</span>
            </span>
            <h2>Inspiring Feedback: What Users Love About Trezo Dashboard</h2>
          </div>

          <Accordion defaultActiveKey="0" className="faq-wrapper mw-740 m-auto">
            <Accordion.Item eventKey="0" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  What is Trezo?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="1" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  What features does Trezo offer?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="3" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  Is Trezo suitable for small businesses?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="4" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  Can I customize Trezo to fit my team&apos;s specific needs?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="5" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  Is Trezo cloud-based or on-premises?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="6" className="mb-3 border-0 bg-white">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: "600",
                    fontSize: "16px",
                  }}
                >
                  Does Trezo integrate with other tools?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to
                help teams streamline their workflow, collaborate effectively,
                and achieve project success.
              </Accordion.Body>
            </Accordion.Item>
          </Accordion>
        </div>
      </div>
    </>
  );
};

export default FaqContent;

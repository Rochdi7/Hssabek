"use client";

import { Card, Accordion } from "react-bootstrap";

const FaqContent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 py-5 mb-4">
        <Card.Body className="p-4" style={{ maxWidth: '800px', margin: 'auto' }}>
          <div className="mb-3 mb-lg-4 text-center" style={{ maxWidth: '500px', margin: 'auto' }}>
            <h3 className="mb-2">Frequently Asked Questions</h3>

            <p>Trezo offers customization options to tailor the platform to your team&apos;s unique requirements. You can customize workflows, templates, and dashboards to align with your processes.</p>
          </div>

          <Accordion className="trezo-accordion" defaultActiveKey="0">
            <Accordion.Item eventKey="0">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  What is Trezo?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="1">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  What features does Trezo offer?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="3">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  Is Trezo suitable for small businesses?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="4">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  Can I customize Trezo to fit my team&apos;s specific needs?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="5">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  Is Trezo cloud-based or on-premises?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="6">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  Does Trezo integrate with other tools?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="7">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  How secure is Trezo?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="8">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  Can I try Trezo before purchasing?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="9">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  What type of customer support does Trezo provide?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>

            <Accordion.Item eventKey="10">
              <Accordion.Header>
                <div
                  style={{
                    fontWeight: '600',
                    fontSize: '16px'
                  }}
                >
                  How do I get started with Trezo?
                </div>
              </Accordion.Header>
              <Accordion.Body>
                Trezo is a comprehensive project management software designed to help teams streamline their workflow, collaborate effectively, and achieve project success.
              </Accordion.Body>
            </Accordion.Item>
          </Accordion>
        </Card.Body>
      </Card>
    </>
  );
};

export default FaqContent;

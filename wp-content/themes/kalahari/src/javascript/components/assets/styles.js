import { css } from 'lit';

export const sharedStyles = css`
  sl-button[type='primary']::part(base) {
    font-weight: bold;
    border-radius: 0.5rem;
    border: 1px solid var(--color-primary);
    background-color: var(--color-primary);
  }
`;
